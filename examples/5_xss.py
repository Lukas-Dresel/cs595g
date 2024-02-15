from flask import Flask, render_template_string, request

app = Flask(__name__)

@app.route('/')
def index():
    comment = request.args.get('comment', '')
    return '<h2>Comments</h2>' + comment

if __name__ == "__main__":
    app.run(port=31337, debug=True)
