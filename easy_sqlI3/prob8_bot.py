import pymysql
conn = pymysql.connect(host='localhost', user='prob8', password='4dminroot!', db='chall', charset='utf8', )
curs = conn.cursor()

sql = "update prob8_user set id='root', pw=md5('FLAG{V3ry_H44444rd_SQL1}')"

curs.execute(sql)
