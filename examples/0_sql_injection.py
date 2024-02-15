import sqlite3
from flask import Flask, request

app = Flask(__name__)

def check_login(username, password):
    conn = sqlite3.connect('users.db')
    cursor = conn.cursor()
    # Vulnerable to SQL injection
    query = f"SELECT * FROM users WHERE username = '{username}' AND password = '{password}'"
    print("Making query:", query)
    cursor.execute(query)
    result = cursor.fetchone()
    conn.close()
    return result

@app.route('/login', methods=['POST'])
def login():
    username = request.form['username']
    password = request.form['password']
    if check_login(username, password):
        return "Logged in successfully."
    else:
        return "Login failed."

if __name__ == "__main__":
    app.run(port=31337, debug=True)
