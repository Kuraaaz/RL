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
    return redirect('/success.html')

@app.route('/submit', methods=['POST'])
def submit_form():
    if request.is_json:
        data = request.get_json()
    else:
        # Gestion alternative pour le format form-urlencoded
        data = request.form.to_dict()

    email = data.get('email')
    if not email:
        return jsonify({"error": "L'email est requis"}), 400

    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()

        cursor.execute("INSERT INTO users (email) VALUES (%s)", (email,))
        conn.commit()

        cursor.close()
        conn.close()

        return jsonify({"message": "Email enregistré avec succès"}), 200
    except mysql.connector.Error as err:
        return jsonify({"error": f"Erreur MySQL : {err}"}), 500


if __name__ == "__main__":
    app.run(debug=True)
