# flag_server.py
import os
from flask import Flask

app = Flask(__name__)

@app.route('/flag')
def flag():
    return os.environ.get('FLAG', 'FLAG{fake_flag}')

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5001, debug=False)
