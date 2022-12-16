import random
import time

import mysql.connector
from mysql.connector import Error

try:
    connection = mysql.connector.connect(host='localhost',
                                         database='captair',
                                         user='root',
                                         password='')

    mycursor = connection.cursor()

    mycursor.execute("SELECT id FROM captair.stations")

    deuxndconnection = mysql.connector.connect(host='localhost',
                                         database='captair',
                                         user='root',
                                         password='')
    myresult = mycursor.fetchall()
    for x in myresult:
        colorlist = ["green", "red", "yellow"]
        rand= random.choice(colorlist)
        print(str(x)[1:5])
        mySql_Create_Table_Query = f"""INSERT INTO captair.air_quality (station, airq, time) VALUES ({str(x)[1:5]}, '{rand}', {int(time.time())} )"""
        deuxndconnection = connection.cursor()
        print(mySql_Create_Table_Query)
        result = deuxndconnection.execute(mySql_Create_Table_Query)
        deuxndconnection.close()

except Error as e:
    print("Error while connecting to MySQL", e)
finally:
    if connection.is_connected():
        connection.commit()
        mycursor.close()
        connection.close()
        print("MySQL connection is closed")