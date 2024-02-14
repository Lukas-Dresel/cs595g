# flag_server.py
import os
from flask import Flask

app = Flask(__name__)

@app.route('/flagflagflag')
def flag():
    return os.environ.get('FLAG', 'FLAG{fake_flag}')

@app.route('/')
def index():
    return '''
        <h1>Simple Flag Server</h1>
        <p>Can you get the flag?</p>
    '''

if __name__ == "__main__":
    app.run(host='0.0.0.0', port=5001, debug=False)
