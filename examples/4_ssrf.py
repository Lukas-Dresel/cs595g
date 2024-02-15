from flask import Flask, request, Response
import requests

app = Flask(__name__)

@app.route('/fetch')
def fetch_url():
    # The URL is taken from the user input without validation
    url = request.args.get('url')
    try:
        # This request could potentially access internal or sensitive resources
        response = requests.get(url)
        return Response(response.content, mimetype='text/plain')
    except requests.RequestException as e:
        return f"Error fetching URL: {e}"

if __name__ == "__main__":
    app.run(debug=True)
