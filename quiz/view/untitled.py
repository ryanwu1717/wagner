import ScanUtility
import bluetooth._bluetooth as bluez
import math
import time
import numpy as np
import pylab
from hcsr04sensor import sensor
import time
import RPi.GPIO as GPIO
import threading


lock = threading.Lock()

#GPIO Mode (BOARD / BCM)
GPIO.setmode(GPIO.BCM)

#set GPIO Pins
GPIO_TRIGGER = 16
GPIO_ECHO = 12
GPIO_ENA = 20
GPIO_PosR = 6
GPIO_NegR = 13
GPIO_PosL = 19
GPIO_NegL = 26
GPIO_ENB = 21
distance = 0

#set GPIO direction (IN / OUT)
GPIO.setup(GPIO_TRIGGER, GPIO.OUT)
GPIO.setup(GPIO_ECHO, GPIO.IN)
GPIO.setup(GPIO_PosR, GPIO.OUT)
GPIO.setup(GPIO_NegR, GPIO.OUT)
GPIO.setup(GPIO_PosL, GPIO.OUT)
GPIO.setup(GPIO_NegL, GPIO.OUT)
GPIO.setup(GPIO_ENA, GPIO.OUT)
GPIO.setup(GPIO_ENB, GPIO.OUT)

#set GPIO PWM frenquence
p = GPIO.PWM(GPIO_ENA, 1000)
q = GPIO.PWM(GPIO_ENB, 1000)


txpower = -64
tStart = time.time()

arrLen = 20
filterDict = {'1': [],
         '2': [], 
         '3': [],
         '4': []}
# filterDict = {'33ac1549-8924-456e-a468-3297f43adfd2': [],
#        'e2c56db5-dffb-48d2-b060-d0f5a71096e0': [], 
#        '5a5a5a5a-5a5a-5a5a-5a5a-5a5a5a5a5a5a': [],
#        'c007ec27-169d-465d-8bd2-1059af0ff693': []}
returnFilter1 = 0
returnFilter2 = 0
returnFilter3 = 0
returnFilter4 = 0
checkFilter = bool(False)
beaconPoint = {'0': [0,0],
              '1': [1,1], 
              '2': [4,2],
              '3': [2,2]}
arr1=[]
arr2=[]
arr3=[]


#funtion code
def stop():
    print('stop action')
    GPIO.output(GPIO_PosR, False)
    GPIO.output(GPIO_NegR, False)
    GPIO.output(GPIO_PosL, False)
    GPIO.output(GPIO_NegL, False)
    print('stop over')

def forward(a):
    print('forward action')
    GPIO.output(GPIO_PosR, True)
    GPIO.output(GPIO_NegR, False)
    GPIO.output(GPIO_PosL, False)
    GPIO.output(GPIO_NegL, True)
    if(a == 0):
        time.sleep(0.75)
    else:
        time.sleep(a)

    print('forward stop')
    stop()

def backward(a):
    print('backward action')
    GPIO.output(GPIO_PosR, False)
    GPIO.output(GPIO_NegR, True)
    GPIO.output(GPIO_PosL, False)
    GPIO.output(GPIO_NegL, True)
    if(a == 0):
        time.sleep(0.75)
    else:
        time.sleep(a)
    print('backward stop')
    stop()

def turnLeft(a):
    print('actionL')
    GPIO.output(GPIO_PosR, False)
    GPIO.output(GPIO_NegR, False)
    GPIO.output(GPIO_PosL, False)
    GPIO.output(GPIO_NegL, True)
    if(a == 0):
        time.sleep(0.7)
    else:
        time.sleep(a)
    stop()
    print('overL')
def turnRight(a):
    print('actionR')
    GPIO.output(GPIO_PosR, True)
    GPIO.output(GPIO_NegR, False)
    GPIO.output(GPIO_PosL, False)
    GPIO.output(GPIO_NegL, False)
    if(a == 0):
        time.sleep(0.6)
    else:
        time.sleep(a)
    stop()
    print('overR')

def turnbackLeft(a):
    print('actionL')
    GPIO.output(GPIO_PosR, True)
    GPIO.output(GPIO_NegR, False)
    GPIO.output(GPIO_PosL, False)
    GPIO.output(GPIO_NegL, False)
    if(a==0):
        time.sleep(1)
    else:
        time.sleep(a)
    stop()
    print('overL')

def d1():
    sr04 = sensor.Measurement(GPIO_TRIGGER, GPIO_ECHO)
#    print(sr04)
    raw_measurement = sr04.raw_distance()
#    print(raw_measurement)
    distance = sr04.distance_metric(raw_measurement)
#    print(distance)
    print('distance is {:.1f} cm'.format(distance))
    #time.sleep(1)
    return distance

#main

def fix():
    # turnbackLeft(1.0)
    # turnLeft(0)
    backward(0)

    forward(0)

def mode(l):
  count_dict={};
  for i in l:
    if i in count_dict:
        count_dict[i]+=1;
    else:
        count_dict[i]=1;
  max_appear=0
  for v in count_dict.values():
    if v>max_appear:
        max_appear=v;
  if max_appear==1:
    return;
  mode_list=[];
  for k,v in count_dict.items():
    if v==max_appear:
        mode_list.append(k);
  return mode_list;
def calculateDistance(rssi):
  try:
    txPower = -63
    if rssi == 0 :
      return -1

    ratio = rssi*1.0 / txpower
    if ratio < 1.0:
      ans= math.pow(ratio, 10)
      return int(ans*100)
    else :
      ans2=(0.89976  (ratio ** 7.7095)) + 0.111
      return int(ans2*100)
  except KeyboardInterrupt:
    pass
  except Exception as e:
    # print("inE3")
    # print (e)
    pass
#Set bluetooth device. Default 0.
dev_id = 0
def inLoop():
  try:
    returnedList = ScanUtility.parse_events(sock, 10)
    if not returnedList is None:
      for item in returnedList:
        # print(item)
        # print(item['type'])
        if not item is None:
          if(item['type'] == "iBeacon"):
            return item ;
          else :
            return {}
        else :
          return {}




  except Exception as e:
    # print("inE1")
    # print (e)
    return {}
    pass

try:
      print(dev_id)
      sock = bluez.hci_open_dev(dev_id)
      print(sock)
      print ("\n *** Looking for BLE Beacons ***\n")
      print ("\n *** CTRL-C to Cancel ***\n")
except:
      print ("Error accessing bluetooth")

ScanUtility.hci_enable_le_scan(sock)
#Scans for iBeacons


def checkRssi(x,z):
  sz = 20 # 数据量

  # x = 0.1  # 真实值
  # z = np.random.normal(x, 0.1, size=sz)  # 观测值，服从高斯分布
  Q = 1e-5  # 过程噪声
  R = 1e-2  # 观测噪声

  # 为变量分配空间
  x_predict = np.zeros(sz)  # x的先验估计，也就是预测值
  P_predict = np.zeros(sz)  # P的先验估计
  x_update = np.zeros(sz)  # x的后验估计，也就是最终的估计量
  P_update = np.zeros(sz)  # 协方差的后验估计
  K = np.zeros(sz)  # 卡尔曼增益

  # 赋初值
  x_update[0] = 0.0
  P_update[0] = 1.0

  for k in range(1, sz):
      # 预测过程
      x_predict[k] = x_update[k - 1]
      P_predict[k] = P_update[k - 1] + Q

      # 更新过程
      K[k] = P_predict[k] / (P_predict[k] + R)
      x_update[k] = x_predict[k] + K[k] * (z[k] - x_predict[k])
      P_update[k] = (1 - K[k]) * P_predict[k]

  pylab.rcParams['font.sans-serif'] = ['FangSong']  # 指定默认字体
  pylab.rcParams['axes.unicode_minus'] = False  # 解决保存图像是负号'-'显示为方块的问题

  pylab.figure()
  pylab.plot(z, 'k+', label='观测值')  # 观测值
  pylab.plot(x_update, 'b-', label='估计值')  # 估计值
  pylab.axhline(x, color='g', label='真实值')  # 真实值
  pylab.legend()
  pylab.show()
  pylab.close()
  # print(z,x_update)
  # print(x_update[9])
  return(x_update[19])

def insec(x,y,R,a,b,S):
  d = math.sqrt((abs(a-x))**2 + (abs(b-y))**2)
  if d > (R+S) or d < (abs(R-S)):
    # print ("Two circles have no intersection")
    return 'wrong'
  elif d == 0 and R==S :
    # print ("Two circles have same center!")
    return 'wrong'
  else:
    A = (R**2 - S**2 + d**2) / (2 * d)
    h = math.sqrt(R**2 - A**2)
    x2 = x + A * (a-x)/d
    y2 = y + A * (b-y)/d
    x3 = round(x2 - h * (b - y) / d,2)
    y3 = round(y2 + h * (a - x) / d,2)
    x4 = round(x2 + h * (b - y) / d,2)
    y4 = round(y2 - h * (a - x) / d,2)
    print (x3, y3)
    print (x4, y4)
    c1=np.array([x3, y3])
    c2=np.array([x4, y4])
    return c1,c2

   
def getPosition(lenArr):
  # print(beaconPoint['0'][0],beaconPoint['0'][1])
  # tmpNode=insec(beaconPoint['0'][0],beaconPoint['0'][1],lenArr[0],beaconPoint['1'][0],beaconPoint['1'][1],lenArr[0])
  # print(lenArr)

  for i in range(0,4,1):
    for j in range(i,4,1):
      # print(beaconPoint[str(i)])
      # print(beaconPoint[i][0],beaconPoint[i][1],lenArr[i],beaconPoint[j][0],beaconPoint[j][1],lenArr[j])
      returnNode = insec(beaconPoint[str(i)][0],beaconPoint[str(i)][1],lenArr[i],beaconPoint[str(j)][0],beaconPoint[str(j)][1],lenArr[j])
      if  returnNode != 'wrong' :
        print(returnNode)
        findNear(returnNode,i,j,lenArr)
        return

      #   print(returnNode)
      # else :
      #   print('failed')


def twodis(array1,array2):
  p1=np.array(array1)
  p2=np.array(array2)
  p3=p2-p1
  p4=math.hypot(p3[0],p3[1])
  print('distance',p4)

  return p4

def findNear(node,point1,point2,lenArr):
  print(node,point1,point2)
  try:
    for i in range(0,4,1):
      if i != point1 and i != point2:
        print(i)
        tmpDis1 = twodis(node[0],beaconPoint[str(i)])
        tmpDis2 = twodis(node[1],beaconPoint[str(i)])
        tmpDis1 = abs(tmpDis1-lenArr[i])
        tmpDis2 = abs(tmpDis2-lenArr[i])
        # print(tmpDis1,tmpDis2)
        if(tmpDis1<tmpDis2):
          lastNode = node[0]
        else:
          lastNode = node[1]
        tmpPosition = lastNode
        print(i,lenArr)

        print(tmpPosition)

        # twodis(node[0],beaconPoint[str(i)])

        return
  except  Exception as e:
    # print(e)
    pass
def job():
  return
  
  p.start(80)
  q.start(80)
  # stop()
  # return
  while True:
    forward(0.4)
    print(tmpRSSI)
    if (-40) < tmpRSSI < (-27):
      print('in')
      stop()
      break
  return

  #   if len(tmpPosition) != 0:
  #     print(tmpPosition)
    
 
  # p.start(80)
  # q.start(80)
  # # fix()
  # print('inJob')
  # for i in range(3):
  #   forward(0);
  # turnRight(0);
  # for i in range(3):
  #   forward(0);
  # turnLeft(0);
  # for i in range(3):
  #   forward(0);
t = threading.Thread(target = job)
t.start()

tmpRSSI = -100
while True:
  try:
    tmpObj =  inLoop()
    if "type" in tmpObj:
      if(tmpObj['uuid'] == "c0b6a76b-ec47-4c30-bfbb-1b435f5ce2f8"):
        if tmpObj['major'] == 2:
          if (tmpObj['rssi']) is not None:
            tmpRSSI = (tmpObj['rssi'])
            # print(tmpRSSI)
          if not tmpNum1 is None:
            if len(filterDict['1']) == arrLen:
              filterDict['1'].pop(0)
              filterDict['1'].append(tmpNum1)
              returnFilter1=int(checkRssi(tmpNum1,filterDict['1']))
          #     checkFilter = bool(True)
            elif len(filterDict['1']) < arrLen:
              filterDict['1'].append(tmpNum1)

  except Exception as e:
    pass

t.join()



