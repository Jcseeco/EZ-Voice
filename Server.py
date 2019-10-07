#!/usr/bin/python3
import os
import socket
import difflib
import pymysql

def searchData(vid):
	db = pymysql.connect(host='localhost', port=3306, user='root', passwd='', db='wtlab109', charset='utf8')
	cursor = db.cursor()
	sql = "SELECT caption FROM sentence WHERE videoId='" + vid + "'"
	cursor.execute(sql)
	data = cursor.fetchone()
	db.close()
	return data[0]

def saveResult(account,vid,result,score,path):
	db = pymysql.connect(host='localhost', port=3306, user='root', passwd='', db='wtlab109', charset='utf8')
	#建立操作游標
	cursor = db.cursor()
	#SQL語法
	sql = "INSERT INTO `result` (`account`, `videoId`, `result`, `score`, `path`) VALUES ('" + account + "', '" + vid + "', '" + result + "', '" + score + "', '" + path + "')"
	#執行語法

	try:
		cursor.execute(sql)
		#提交修改
		db.commit()
		print("寫入資料庫成功")
	except:
		#發生錯誤時停止執行SQL
		db.rollback()
		print("寫入資料庫失敗")

	#關閉連線
	db.close()
	
def hitScore(ans,result):
	score = ""
	temp = difflib.SequenceMatcher(None,ans,result).ratio()
	temp = (str)(round(temp*100, 2))
	if len(temp) > 5:
		for k in range(0,4):
			score += temp[k]
	else:
		for l in range(0,len(temp)):
			score += temp[l]
	print("分數 : %s" % (score))
	return score

def getResult():
	if os.path.isfile('temp.txt'):
		f = open('temp.txt', 'r')
		result = f.read()
		os.remove('temp.txt')
	else :
		result = ""
	return result

def main():
	s = socket.socket()  
	host = "127.0.0.1"  
	port = 12345  
	s.bind((host, port))  

	s.listen(5)  
	while True:
		c, addr = s.accept()  
		print("連接：", addr)
		temp = ""
		task = str(c.recv(1024))
		for i in range(2,len(task)-1): 
			temp += task[i]
		temp = temp.split("&")
		path = "/opt/lampp/htdocs/wtlab109/voice/" + temp[0]
		videoId = temp[1]
		account = temp[2]
		ans = searchData(videoId)
		print("帳號 : " + account)
		print("音檔路徑 : " + path)    
		print("例句 : " + ans)
		os.system("deepspeech --model models/output_graph.pbmm --alphabet models/alphabet.txt --lm models/lm.binary --trie models/trie --audio " + path )

		result = getResult()
		score = hitScore(ans,result)
		msg = str.encode(score)
		c.send(msg)
		msg = str.encode("*")
		c.send(msg)
		msg = str.encode(result)
		c.send(msg)
		c.close()
		saveResult(account,videoId,result,score,path)
		print("--------------------------------------------------------------")

if __name__ =='__main__':
    main()
