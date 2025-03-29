from flask import Flask, request, jsonify, render_template

app = Flask(__name__)

@app.route('/')
def home():
    return render_template('home.html')

# Страница с флагом
@app.route('/flag', methods=['GET', 'POST'])
def treasure():
    fullflag = 'DUCKERZ{fake_flag}'
    flag_part1 = "DUCKERZ{fak"
    flag_part2 = "e_fl"
    flag_part3 = "ag}"

    if request.method == 'GET':
        if request.args:
            return jsonify({"flagp3": flag_part3})
        return jsonify({"flagp1": flag_part1})

    elif request.method == 'POST':
        return jsonify({"flagp2": flag_part2})

    return jsonify({"error": "Неверный запрос"}), 400

if __name__ == '__main__':
    app.run(host="0.0.0.0", debug=False)