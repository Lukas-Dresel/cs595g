# Python Flask application simulating a simple archive.org clone vulnerable to SSRF
from flask import Flask, request, abort
import requests
import logging

app = Flask(__name__)

# Simple in-memory "archive" for demonstration purposes
ARCHIVE = {}

@app.route('/')
def index():
    return '''
        <h1>Simple Archive Clone</h1>
        <h2>Archive a URL</h2>
        <form action="/archive" method="post">
            URL to Archive: <input type="text" name="url"><br>
            <input type="submit" value="Archive">
        </form>
        <h2>View a URL</h2>
        <form action="/view" method="get">
            URL to View: <input type="text" name="url"><br>
            <input type="submit" value="View">
        </form>
    '''

@app.route('/archive', methods=['POST'])
def archive():
    url = request.form.get('url')
    if not url:
        return "URL is required", 400

    try:
        # Vulnerable external request
        response = requests.get(url, timeout=5)
        # Store the response in a simple archive with URL as key
        ARCHIVE[url] = response.text
        return f'Successfully archived {url}'
    except requests.RequestException as e:
        logging.error(f"Failed to archive {url}: {e}")
        abort(500, description="Failed to fetch the URL.")

@app.route('/view', methods=['GET'])
def view():
    url = request.args.get('url')
    if url in ARCHIVE:
        # Return archived content
        return ARCHIVE[url]
    else:
        return "URL not found in archive", 404

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=False)
