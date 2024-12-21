from flask import Flask, request, jsonify, redirect
import mysql.connector

app = Flask(__name__)

db_config = {
    "host": "localhost",
    "user": "root",
    "password": "password",
    "database": "repair_lycee"
}

@app.route('/success')
def success():
    return "gg"

@app.route('/submit', methods=['POST'])
def submit_form():
    email = request.form.get('email')
    if not email:
        return jsonify({"error": "L'email est requis"}), 400
    
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()

        cursor.execute("INSERT INTO users (email) VALUES (%s)", (email,))
        conn.commit()

        cursor.close()
        conn.close()

        return redirect('/success.html')
    except mysql.connector.Error as err:
        return jsonify({"error": f"Erreur MySQL : {err}"}), 500

if __name__ == "__main__":
    app.run(debug=True)
