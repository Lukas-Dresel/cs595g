from flask import Flask, request, render_template_string

app = Flask(__name__)

@app.route('/vulnerable')
def index():
    name = request.args.get('name', 'World')
    template = f'<h1>Hello, {name}!</h1>'
    return render_template_string(template)

TEMPLATE = '''
<h1>Hello, {{ name }}!</h1>
'''
@app.route('/not_vulnerable')
def index2():
    name = request.args.get('name', 'World')
    return render_template_string(TEMPLATE, name=name)

if __name__ == "__main__":
    app.run(port=31337, debug=True)
