import React from 'react';
import { BrowserRouter } from 'react-router-dom';
import Routes from './routes';

function App() {
  return (
    <BrowserRouter>
      <div className="container mt-4">
        <h1 className="mb-4">Блог</h1>
        <Routes />
      </div>
    </BrowserRouter>
  );
}

export default App;
