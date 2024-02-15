from flask import Flask, send_from_directory, request

app = Flask(__name__)

@app.route('/files')
def serve_file():
    filename = request.args.get('filename')
    with open('./static_files/' + filename, 'r') as file:
        return file.read()

if __name__ == "__main__":
    app.run(port=31337, debug=True)
