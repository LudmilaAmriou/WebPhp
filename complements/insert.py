import pandas as pd
import pymysql
data = pd.read_csv ('/home/ludmila/Downloads/ingredient.csv')   
df = pd.DataFrame(data)

print(df)


# database connection
connection = pymysql.connect(host="localhost", port=3306, user="ludmila", passwd="dalilahlili", database="projet_tdw")
cursor = connection.cursor()
# some other statements  with the help of cursor


for row in df.itertuples():
   
        sql = """INSERT INTO `ingredient` (ingId, nomIng,pourcentage,nbCalorie,saisonIng,recette_id)
                VALUES (%s,%s,%s,%s,%s,%s) 
            """
        cursor.execute(sql,(row.ingId,row.nomIng,row.pourcentage,row.nbCalories,row.saisonIng,row.recette_id))

connection.commit()
connection.close()

