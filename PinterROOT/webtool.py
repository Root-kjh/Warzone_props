# -*- coding: utf-8 -*-

from flask import Flask, request, render_template, session, redirect, Markup, send_from_directory, send_file, render_template_string
import db
import urllib2
import sys
import os
import image_control
from flask_csp.csp import csp_header

reload(sys)
sys.setdefaultencoding('utf-8')
app = Flask(__name__)
app.secret_key="FLAG{F14sk_1s_fUn11}"
fail_location={
	"삭제" : 'delete_sign',
	"수정" : 'load_sign'
}
img_ext={".jpeg",".jfif",".exif",".tiff",".gif",".bmp",".png",".ppm",".pgm",".pbm",".pnm",".webp",".hdr",".heif",".bpg",".cgm",".svg",".jpg"}

class error(Exception):
	def __str__(self):
		return "error"
@app.route("/robots.txt")
def rebots():
	return render_template('robots.txt')

@app.route("/index") 
@app.route("/")
def main():
	if session.get('logged_in'):
		return render_template('home.html')
	else:
		return render_template('start.html')

@app.route("/login", methods=['POST'])
def login():
	if request.method=='POST':
		try:
			name=request.form['name']
			pw=request.form['pw']
			user_object=db.login(name,pw)
			session['logged_in']=True
			session['name']=user_object.get_name()
		except:
			pass
	return redirect("https://warzone.kro.kr/PinterROOT/")

@app.route("/signup", methods=['POST'])
def signUP():
	if request.method=='POST':
		name=request.form['name']
		if(len(name)>6):
			pw=request.form['pw']
			pwr=request.form['pwr']
			if(pw==pwr):
				try:
					db.signup(name,pw)
					return redirect(urllib2.quote("success/user/회원가입"))
				except:
					return redirect(urllib2.quote("fail/user/회원가입"))
	return redirect(urllib2.quote("fail/user/회원가입"))

@app.route("/gallery")
def gallery():
	if session.get('logged_in'):
		my_image_object=db.select_all_image_db()
		rows=my_image_object.get_all_image()
		myg=""
		if(len(rows)<3):
			myg="""
			<div class="jumbotron" style="margin-top:1rem">
				<h1 class="display-4">이미지가 없습니다!</h1>
				<p class="lead">아름다운 이미지를 업로드해 주세요.</p>
				<hr class="my-4">
				<a class="btn btn-primary btn-lg" href="/PinterROOT/upload" role="button">업로드하러 가기</a>
			</div>
			"""
		else:
			myg_header="""<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">"""
			myg_footer="""</div>"""
			i=0
			for row in rows:
				if(len(str(row[1]))<5):
					continue
				if(i%2==0):
					myg+=myg_header
				myg+="""
				<div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
					<div class="my-3 p-3">
						<h2 class="display-5">%s</h2>
					</div>
					<div class="bg-dark box-shadow mx-auto" style="width: 80%s height: 300px%s border-radius: 21px 21px 0 0%s">
					<img style="border-radius: 21px 21px 0 0%s height: 300px%s" src=%s>
					</div>
				</div>
					"""%(row[2],';',';',';',';',';',row[1])
				if(i%2==1):
					myg+=myg_footer
				i+=1
		myg=Markup(myg)
		return render_template('MyGallery.html',myg=myg)
	else:
		return render_template('not_logged_in.html')

@app.route("/logout")
def logout():
	session.pop('name',None)
	session.pop('logged_in',None)
	return redirect("https://warzone.kro.kr/PinterROOT/")

@app.route("/upload")
def upload():
	if session.get('logged_in'):
		return render_template('upload.html')
	else:
		return render_template('not_logged_in.html')

@app.route("/upload_image",methods=['POST'])
def upload_imgae():
	if session.get('logged_in'):
		if request.method=='POST':
			name=request.form['id']
			title=request.form['title']
			if(name==session.get('name')):
				try:
					image=request.files['image']
					extension = os.path.splitext(image.filename)[1]
					if not extension in img_ext:
						raise error()
					image_count_object=db.upload_image_db(name,title,extension)
					src=image_count_object.get_dir()
					image_control.image_upload(image,src)
					return redirect(urllib2.quote("success/image/upload"))
				except:
					return redirect(urllib2.quote("fail/image/upload"))
			return redirect(urllib2.quote("fail/image/upload"))	
	else:
		return render_template('not_logged_in.html')

@app.route("/delete_image",methods=['POST'])
def delete_image():
	if session.get('logged_in'):
		return render_template('load_sign.html')
	else:
		return render_template('not_logged_in.html')

@app.route("/MyGallery")
def my_gallery():
	if session.get('logged_in'):
		my_image_object=db.select_my_image_db(session.get('name'))
		rows=my_image_object.get_my_image()
		myg=""
		if(len(rows)<3):
			myg="""
			<div class="jumbotron" style="margin-top:1rem">
				<h1 class="display-4">이미지가 없습니다!</h1>
				<p class="lead">아름다운 이미지를 업로드해 주세요.</p>
				<hr class="my-4">
				<a class="btn btn-primary btn-lg" href="/PinterROOT/upload" role="button">업로드하러 가기</a>
			</div>
			"""
		else:
			myg_header="""<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">"""
			myg_footer="""</div>"""
			i=0
			for row in rows:
				if(len(str(row[1]))<5):
					continue
				if(i%2==0):
					myg+=myg_header
				myg+="""
				<div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
					<div class="my-3 p-3">
						<h2 class="display-5">%s</h2>
					</div>
					<div class="bg-dark box-shadow mx-auto" style="width: 80%s height: 300px%s border-radius: 21px 21px 0 0%s">
					<img style="border-radius: 21px 21px 0 0%s height: 300px%s" src=%s>
					</div>
				</div>
					"""%(row[2],';',';',';',';',';',row[1])
				if(i%2==1):
					myg+=myg_footer
				i+=1
		myg=Markup(myg)
		return render_template('MyGallery.html',myg=myg)
	else:
		return render_template('not_logged_in.html')

@app.route("/delete_sign")
def delete_sign():
	if session.get('logged_in'):
		return render_template('delete_sign.html')
	else:
		return render_template('not_logged_in.html')

@app.route("/delete_sign_real",methods=['POST'])
def delete_sign_real():
	if session.get('logged_in'):
		if request.method=='POST':

			pw=request.form['pw']
			name=request.form['id']
			if(name==session.get('name')):
				try:
					db.delete_sign(session.get('name'),pw)
					return redirect(urllib2.quote("success/user/삭제"))
				except:
					return redirect(urllib2.quote("fail/user/삭제"))
		return redirect(urllib2.quote("fail/user/삭제"))
	else:
		return render_template('not_logged_in.html')

@app.route("/edit_sign",methods=['POST'])
def edit_sign():
	if session.get('logged_in'):
		if request.method=='POST':
			name=request.form['id']
			opw=request.form['opw']
			pw=request.form['pw']
			pwr=request.form['pwr']
			if(name==session.get('name')):
				if(pw==pwr):
					try:
						db.edit_sign(session.get('name'),opw,pw)
						return redirect(urllib2.quote("success/user/수정"))
					except:
						return redirect(urllib2.quote("fail/user/수정"))
		return redirect(urllib2.quote("fail/user/수정"))
	else:
		return render_template('not_logged_in.html')

@app.route("/get/<src1>/<src2>/<filename>")
def get(src1,src2,filename):
	if session.get('logged_in'):
		if request.method=='GET':
			return send_file(src1+"/"+src2+"/"+filename)
	else:
		return render_template('not_logged_in.html')

@app.route("/load_sign")
def load_sign():
	if session.get('logged_in'):
		return render_template('load_sign.html')
	else:
		return render_template('not_logged_in.html')

@app.route("/fail/<subject>/<option>",methods=['GET'])
def fail(subject,option):
	location="/PinterROOT/"
	if(subject=='user'):
		global fail_location
		if(option in fail_location):
			location+=fail_location[option]
	if(subject=='image'):
		location+='MyGallery'
	template="""<script>alert('%s의 %s이(가) 실패했습니다.');
			location.href='%s';</script>"""%(subject,option,location)
	return render_template_string(template,subject=subject,option=option,location=location)

@app.route("/success/<subject>/<option>",methods=['GET'])
def success(subject,option):
	location="/PinterROOT/"
	if(subject=='user' and option=='삭제'):
		session.pop('name',None)
		session.pop('logged_in',None)
	if(subject=='image'):
		location+='MyGallery'
	template="""<script>alert('%s의 %s이(가) 성공했습니다.');
			location.href='%s';</script>"""%(subject,option,location)
	return render_template_string(template,subject=subject,option=option,location=location)

if __name__ == "__main__":
	app.run(debug=True)
