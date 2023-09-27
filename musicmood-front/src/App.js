import logo from './logo.svg';
import './App.css';
import React, { useEffect } from 'react';
import axios from 'axios';

function App() {
  console.log("he entrado en app()");
  useEffect(() => {
    axios.get('https://musicmood:8890/api.php')
      .then(response => {
        console.log('Datos recibidos:', response.data);
      })
      .catch(error => {
        console.log('Error al obtener datos:', error);
      });
  }, []);

  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  );
}

export default App;
