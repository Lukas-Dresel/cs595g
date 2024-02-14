const express = require('express');

const app = express();
app.set('view engine', 'ejs');

app.use(express.urlencoded({ extended: false }));
app.use(express.static("public"));

const ADMIN_ID = Math.floor(Math.random() * 90) + 10;
const FLAG = process.env.FLAG || "flag{hardcode}";
const PORT = 80

console.log(ADMIN_ID)


app.get('/user/:param', (req, res) => {

  if (ADMIN_ID != req.params.param){
    res.render('user', { num: req.params.param });
  }
  else {
    res.render('user', { num: FLAG });
  }
})

app.get('/', (req, res) => {

  res.redirect('/user/1'); 
});

app.listen(PORT,() => console.log(`server listening on port ${PORT}`));