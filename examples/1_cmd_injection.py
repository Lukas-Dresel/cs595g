import subprocess
from flask import Flask, request

app = Flask(__name__)

@app.route('/ping', methods=['GET'])
def ping():
    host = request.args.get('host')
    # Vulnerable to command injection
    result = subprocess.getoutput(f'ping -c 1 {host}')
    return result

if __name__ == "__main__":
    app.run(port=31337, debug=True)
