
//Variables
const mysql = require('mysql'); //for sql
const express = require('express'); //for express
const app = express(); //for app
const morgan = require('morgan'); //for terminal info

app.use(morgan('short'));

const port = 4400;

app.listen(port, () => {
    console.log("Server er oppe og lytter på " + port);
});

//Database connection
const connection = mysql.createConnection ({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'chainboxdb'
});

app.get("/api", (req, res) => {
    console.log("Responding to root route");
    res.send("/users eller /products for json");
});
  
app.get("/api/products", (req, res) => {
    connection.query("SELECT * FROM products", (err, rows, fields) => {
  
      console.log("Fetching all products");
  
      //If theres an error
      if (err) {
        console.log("Failed to query for products: " + err);
        res.sendStatus(500); //500 = server error
        return;
      }
  
      //If successful
      console.log("I think we fetched products successfully");
      res.json(rows);
    })
  })

  app.get("/api/users", (req, res) => {
    connection.query("SELECT * FROM users", (err, rows, fields) => {
  
      console.log("Fetching all users");
  
      //If theres an error
      if (err) {
        console.log("Failed to query for users: " + err);
        res.sendStatus(500); //500 = server error
        return;
      }
  
      //If successful
      console.log("I think we fetched users successfully");
      res.json(rows);
    })
  })

  app.get("/api/users/:id", (req, res) => {
    connection.query("SELECT * FROM users WHERE id=?", (err, rows, fields) => {
  
      console.log("Fetching users");
  
      //If theres an error
      if (err) {
        console.log("Failed to query for users: " + err);
        res.sendStatus(500); //500 = server error
        return;
      }
  
      //If successful
      console.log("I think we fetched users successfully");
      res.json(rows);
    })
  })

  app.get("/api/newsletter", (req, res) => {
    connection.query("SELECT * FROM newsletter", (err, rows, fields) => {
  
      console.log("Fetching all newsletter users");
  
      //If theres an error
      if (err) {
        console.log("Failed to query for newsletter users: " + err);
        res.sendStatus(500); //500 = server error
        return;
      }
  
      //If successful
      console.log("I think we fetched newsletter users successfully");
      res.json(rows);
    })
  })
  