import requests
from bs4 import BeautifulSoup


url = "https://www.eiffel-bordeaux.org/"

def get_text_if_not_none(e):
    if e:
        return e.text
    else:
        return None


response = requests.get(url)
response.encoding = response.encoding
output_file = "mainlycee.html"

def write_into_file(filename):
    if response.status_code == 200:
        html = response.text
        with open(filename, 'w', encoding='utf-8') as file:
            file.write(html)
        
        soup = BeautifulSoup(html, "html5lib")

    else:
        print("Error :", response.status_code)

def main():
    write_into_file(output_file)

main()