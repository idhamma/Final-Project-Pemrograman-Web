import random

# Daftar nama pengguna
names = [f'user{i}' for i in range(1, 101)]
nama = [
    "Adi", "Budi", "Citra", "Dewi", "Eko",
    "Fina", "Gita", "Hani", "Indah", "Joko",
    "Kiki", "Lina", "Mila", "Nina", "Oki",
    "Puput", "Qori", "Rina", "Siti", "Tia",
    "Umi", "Vina", "Wati", "Xena", "Yani",
    "Zara", "Amir", "Bella", "Cesar", "Dina",
    "Elva", "Fajar", "Gilang", "Hilda", "Irma",
    "Jeje", "Kamil", "Lulu", "Mira", "Nico",
    "Olga", "Pasha", "Queen", "Rafi", "Sasha",
    "Tara", "Udin", "Vito", "Wulan", "Xander",
    "Yuda", "Zaki", "Alya", "Bayu", "Cindy"
]

# Daftar alamat
addresses = ['Bali', 'Surabaya', 'Malang']

# Template password hash
password_hash = '$2y$12$SDlfyhJ/1K6M9Wdjvv49t.yEDMwqJPCwegKeA5sEuEPVXXOK5i0yq'

# Buat skrip SQL
sql_statements = "INSERT INTO users (id, name, email, phone_number, address, email_verified_at, password, remember_token, created_at, updated_at) VALUES \n"

values = []

for i in range(1, 50):
    name = nama[i]
    email = f'{name}@gmail.com'
    phone_number = f'08135628{str(i).zfill(2)}'
    address = random.choice(addresses)
    value = f"({i}, '{name}', '{email}', '{phone_number}', '{address}', NULL, '{password_hash}', NULL, NULL, NULL)"
    values.append(value)

sql_statements += ",\n".join(values) + ";"

# Tampilkan hasil
print(sql_statements)
