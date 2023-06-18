import pymysql
import pandas as pd
from sklearn.linear_model import LinearRegression
from sklearn.metrics import mean_absolute_error, mean_squared_error
conn = pymysql.connect(
    host='localhost',
    user='root',
    password='root',
    database='chernivtsigas'
)