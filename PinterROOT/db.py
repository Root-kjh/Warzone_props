# -*- coding: utf-8 -*-
import pymysql
import hashlib
import codecs
import json
import sys
import logging

class db():
    con=pymysql.connect(host='localhost',user='prob10',password='Pr0b1o_P4ssw0rd',db='chall',charset='utf8')
    cur=con.cursor()

class db_error(Exception):
    def __str__(self):
        return logging.exception("message")

class login(db):
    def __init__(self,name,pw):
        self.name=name
        self.pw=hashlib.sha512(pw).hexdigest()
        sql="select id from prob10_user where id=%s and pw=%s"
        db.cur.execute(sql,(self.name,self.pw))
        db.con.commit()
        user_name=''
        for data in db.cur.fetchall():
            if (len(str(data[0]))>6 and str(data[0])!='None'):
                self.user_name=str(data[0])
        
        if not (len(self.user_name)>6):
            raise db_error()


    def get_name(self):
        return self.user_name
        
class signup(db):
    def __init__(self,name,pw):
        self.name=name
        self.pw=hashlib.sha512(pw).hexdigest()
        sql="insert prob10_user(id,pw) values(%s,%s)"
        db.cur.execute(sql,(self.name,self.pw))
        db.con.commit()

class upload_image_db(db):
    def __init__(self,name,title,extension):
        self.name=name
        self.title=title
        self.extension=extension
        sql="select count(*) from prob10_gallery"
        db.cur.execute(sql)
        db.con.commit()
        count=0
        for data in db.cur.fetchall():
            if (len(str(data[0]))>0):
                count=str(data[0])
        self.dir="/uploads/%s%s"%(count,extension)
        sql="insert into prob10_gallery(dir,id,title) values(%s,%s,%s)"
        db.cur.execute(sql,("/PinterROOT/get/templates"+self.dir,self.name,self.title))
        db.con.commit

    def get_dir(self):
        return self.dir

class select_all_image_db():
    def __init__(self):
        sql="select count(*) from prob10_gallery"
        db.cur.execute(sql)
        db.con.commit()
        count=0
        for data in db.cur.fetchall():
            if (int(str(data[0]))>0):
                count=int(str(data[0]))
        if(count==0):
            self.images=''
            return
        
        self.images=[[0 for rows in range(int(count*5))]for cols in range(10)]
        sql="select idx,dir,title from prob10_gallery"
        db.cur.execute(sql)
        db.con.commit()
        i=0
        for data in db.cur.fetchall():
            if(len(str(data[1]))>5):
                self.images[i][0]=str(data[0])
                self.images[i][1]=str(data[1])
                self.images[i][2]=str(data[2])
                i+=1
                if(i-1)==count:
                    break

    def get_all_image(self):
        return self.images

class select_my_image_db():
    def __init__(self,name):
        self.name=name
        sql="select count(*) from prob10_gallery where id=%s"
        db.cur.execute(sql,(self.name))
        db.con.commit()
        count=0
        for data in db.cur.fetchall():
            if (int(str(data[0]))>0):
                count=int(str(data[0]))
        if(count==0):
            self.images=''
            return
        
        self.images=[[0 for rows in range(int(count*5))]for cols in range(10)]
        sql="select idx,dir,title from prob10_gallery where id=%s"
        db.cur.execute(sql,(self.name))
        db.con.commit()
        i=0
        for data in db.cur.fetchall():
            if(len(str(data[1]))>5):
                self.images[i][0]=str(data[0])
                self.images[i][1]=str(data[1])
                self.images[i][2]=str(data[2])
                i+=1
                if(i-1)==count:
                    break

    def get_my_image(self):
        return self.images

class delete_sign():
    def __init__(self,name,pw):
        self.name=name
        self.pw=hashlib.sha512(pw).hexdigest()

        sql="select id from prob10_user where id=%s and pw=%s"
        db.cur.execute(sql,(self.name,self.pw))
        db.con.commit()
        user_name=''
        for data in db.cur.fetchall():
            if (len(str(data[0]))>6 and str(data[0])!='None'):
                self.user_name=str(data[0])
        
        if not (len(self.user_name)>6):
            raise db_error()

        sql="delete from prob10_user where id=%s and pw=%s"
        db.cur.execute(sql,(self.name,self.pw))
        db.con.commit()

class edit_sign(db):
    def __init__(self,name,opw,pw):
        self.name=name
        self.opw=hashlib.sha512(opw).hexdigest()
        self.pw=hashlib.sha512(pw).hexdigest()
        
        sql="select id from prob10_user where id=%s and pw=%s"
        db.cur.execute(sql,(self.name,self.opw))
        db.con.commit()
        user_name=''
        for data in db.cur.fetchall():
            if (len(str(data[0]))>6 and str(data[0])!='None'):
                self.user_name=str(data[0])
        
        if not (len(self.user_name)>6):
            raise db_error()
    
        sql="update prob10_user set pw=%s where id=%s and pw=%s"
        db.cur.execute(sql,(self.pw,self.name,self.opw))
        db.con.commit()
