from selenium import webdriver
from bs4 import BeautifulSoup

driver = webdriver.PhantomJS('/home/root_kjh/phantomjs-2.1.1-linux-x86_64/bin/phantomjs')

driver.get('http://warzone.kro.kr/QnA/login.html')
driver.implicitly_wait(3)
driver.find_element_by_name('id').send_keys('root')
driver.find_element_by_name('pw').send_keys('4dminroot!')
driver.find_element_by_xpath("/html/body/div/div/div/form/fieldset/div[3]/div[1]/input").click()
driver.get('http://warzone.kro.kr/QnA/root.php')
html=driver.page_source
soup=BeautifulSoup(html,'html.parser')
raw_list=soup.select('div')

for i in raw_list:
	driver.get("http://warzone.kro.kr/QnA/view.php?idx="+i.getText())
	driver.implicitly_wait(3)
	html=driver.page_source
	soup=BeautifulSoup(html,'html.parser')

driver.quit()
