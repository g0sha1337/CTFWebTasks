from flask import Flask, request, jsonify, make_response, render_template
import jwt
import datetime

app = Flask(__name__)
app.secret_key = 'seniorfluffy'  # Secret key of jwt token


users = {
    "guest": "guest",
    "admin": "iofe123wjhhroo$whiqrfo%uwehfhutwehufio" # сложный пароль
}


@app.route('/')
def home():
    return render_template('index.html') 

# Функция для генерации JWT токена
def generate_token(username):
    token = jwt.encode({
        'user': username,
    }, app.secret_key, algorithm='HS256')
    return token

@app.route('/login', methods=['POST'])
def login():
    data = request.json
    username = data.get('username')
    password = data.get('password')

    # Проверка пользователя
    if username in users and users[username] == password:
        token = generate_token(username)
        response = make_response(jsonify({'message': 'Login successful'}))
        response.set_cookie('jwt', token)  # Сохранение токена в куки
        return response
    return jsonify({'message': 'Invalid credentials'}), 401

@app.route('/flag', methods=['GET'])
def protected():
    token = request.cookies.get('jwt')  # Получение токена из куки
    if not token:
        return jsonify({'message': 'Token is missing!'}), 403

    try:
        payload = jwt.decode(token, app.secret_key, algorithms=['HS256'])
        if payload['user'] == "admin":
            return jsonify({'message': 'PolyCTF{fake_flag}'})
        else:
            return jsonify({'message': 'Only user \'admin\' have access to this page!'})
    except jwt.ExpiredSignatureError:
        return jsonify({'message': 'Token has expired!'}), 403
    except jwt.InvalidTokenError:
        return jsonify({'message': 'Invalid token!'}), 403

if __name__ == '__main__':
    app.run(debug=True)