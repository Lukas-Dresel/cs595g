const express = require('express');
const bodyParser = require('body-parser');
const app = express();

const db = require('better-sqlite3')('db.sqlite3');


db.exec(`DROP TABLE IF EXISTS users;`);
db.exec(`CREATE TABLE users(
    id INTEGER PRIMARY KEY,
    username TEXT,
    password TEXT
);`);

const FLAG = process.env.FLAG || "flag{love_sqli}";
const PORT = process.env.PORT || 3000;

db.exec(`INSERT INTO users (username, password) VALUES ('user-1', 'ny7AagPuKswv') `);

app.use(express.urlencoded({ extended: false }));
app.use(express.static("public"));

app.post("/login", (req, res) => {
    const { user, pass } = req.body;
    const query = `SELECT id FROM users WHERE username = '${user}' AND password = '${pass}';`;
    console.log(query)
    //const query = `SELECT id FROM users WHERE username = '1' OR id=1;--AND password = '1' OR '1'='1';`
    try {
        console.log(db.prepare(query));
        const id = db.prepare(query).get()?.id;
        if (!id) {
            return res.redirect("/?message=Incorrect username or password");
        }

        if (id) {
            return res.redirect("/?flag=" + encodeURIComponent(FLAG));
        }
        return res.redirect("/?message=Error");
    }
    catch {
        return res.redirect("/?message=I think you are close...");
    }
});

app.listen(PORT, () => console.log(`listening on port ${PORT}`));