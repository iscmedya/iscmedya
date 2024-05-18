const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

// MySQL veritabanı bağlantısı
const connection = mysql.createConnection({
    host: 'sql11.freesqldatabase.com',
    user: 'sql11703078',
    password: 'yJkjZE1LAp',
    database: 'sql11703078' // Veritabanı adını değiştirin
});

connection.connect((err) => {
    if (err) {
        console.error('MySQL connection error:', err);
        return;
    }
    console.log('Connected to MySQL database');
});

// Yeni yorum oluşturma endpoint'i
app.post('/comments', (req, res) => {
    const { name, email, website, message } = req.body;

    // MySQL'ye yeni yorumu ekle
    const sql = 'INSERT INTO comments (name, email, website, message) VALUES (?, ?, ?, ?)';
    connection.query(sql, [name, email, website, message], (err, result) => {
        if (err) {
            console.error('MySQL query error:', err);
            res.status(500).send('Internal Server Error');
        } else {
            console.log('Yorum eklendi:', result);
            res.status(201).send('Yorum başarıyla eklendi');
        }
    });
});

// Yorumları almak için endpoint
app.get('/comments', (req, res) => {
    // MySQL'den tüm yorumları al
    const sql = 'SELECT * FROM comments';
    connection.query(sql, (err, results) => {
        if (err) {
            console.error('MySQL query error:', err);
            res.status(500).send('Internal Server Error');
        } else {
            // Alınan yorumları istemciye gönder
            res.status(200).json(results);
        }
    });
});

// Sunucuyu dinle
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
