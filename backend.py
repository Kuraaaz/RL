from flask import Flask, request, jsonify, redirect, url_for, render_template
import mysql.connector

app = Flask(__name__)

# Configuration de la base de données
db_config = {
    "host": "127.0.0.1",
    "user": "root",
    "password": "Sotcamontop94!",
    "database": "repair_lycee",
    "port": 3306
}

# Route pour la page d'accueil
@app.route('/index')
def index():
    return render_template('index.html')

# Route pour la page du formulaire
@app.route('/formulaire')
def formulaire():
    return render_template('formulaire.html')

# Route pour soumettre le formulaire
@app.route('/submit', methods=['POST'])
def submit_form():
    email = request.form.get('email')
    if not email:
        return jsonify({"error": "L'email est requis"}), 400

    try:
        # Connexion à la base de données
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()

        # Insertion de l'email
        cursor.execute("INSERT INTO users (email) VALUES (%s)", (email,))
        conn.commit()

        cursor.close()
        conn.close()

        # Redirection vers la page de succès
        return redirect(url_for('success'))
    except mysql.connector.Error as err:
        return jsonify({"error": f"Erreur MySQL : {err}"}), 500

# Route pour la page de succès
@app.route('/success')
def success():
    return render_template('success.html')

# Lancer le serveur Flask
if __name__ == "__main__":
    app.run(debug=True)