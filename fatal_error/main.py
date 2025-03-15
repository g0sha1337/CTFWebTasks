from flask import *
from flask_cors import CORS

host = Flask(__name__)
CORS(host)

@host.route('/')
def index():
    return render_template("index.html")

@host.route('/check_clicks', methods=['POST'])
def check_clicks():
  data = request.get_json()

  if data['clicks'] >= 600000:
    return jsonify("DUCKERZ{fake_flag}"), 200
  else:
    return jsonify("Try harder!"), 200

if __name__ == "__main__":
  host.run(host="0.0.0.0", port=23002, debug=True)
