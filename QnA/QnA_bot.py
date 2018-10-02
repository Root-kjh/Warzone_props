from selenium import webdriver
from bs4 import BeautifulSoup
import threading, time
driver = webdriver.PhantomJS('/var/www/html/QnA/phantomjs-2.1.1-linux-x86_64/bin/phantomjs')

driver.get('http://warzone.kro.kr/QnA/login.html')
driver.implicitly_wait(3)
driver.find_element_by_name('id').send_keys('root')
driver.find_element_by_name('pw').send_keys('4dminroot!')
driver.find_element_by_xpath("/html/body/div/div/div/form/fieldset/div[3]/div[1]/input").click()
driver.get('http://warzone.kro.kr/QnA/root.php')
html=driver.page_source
soup=BeautifulSoup(html,'html.parser')
raw_list=soup.select('div')
flag=False

def check():
	time.sleep(2)
	if not (flag):
		driver.quit()
		exit(1)	
for i in raw_list:
	flag=False
	t=threading.Thread(target=check)
	t.start()
        driver.get("http://warzone.kro.kr/QnA/view.php?idx="+i.getText())
	flag=True
	t.join()
driver.quit()
