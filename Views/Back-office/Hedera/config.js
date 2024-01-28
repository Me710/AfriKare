const mysql = require("mysql");

const dbConfig = {
  host: "localhost",
  user: "root",
  password: "",
  database: "afrikare",
  connectionLimit: 10, // Adjust the connection limit as needed
};

const pool = mysql.createPool(dbConfig);

function executeQuery(query, params = []) {
  return new Promise((resolve, reject) => {
    pool.getConnection((err, connection) => {
      if (err) {
        reject(err);
        return;
      }

      connection.query(query, params, (error, results) => {
        connection.release();

        if (error) {
          reject(error);
        } else {
          resolve(results);
        }
      });
    });
  });
}

module.exports = {
  executeQuery,
};
