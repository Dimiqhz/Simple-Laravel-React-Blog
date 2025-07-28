import React, { useState } from 'react';
import api from '../api/axios';

export default function ArticleForm() {
  const [title, setTitle] = useState('');
  const [body, setContent] = useState('');

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    api.post('/articles', { title, body }).then(() => {
      setTitle('');
      setContent('');
      window.location.reload();
    });
  };

  return (
    <form onSubmit={handleSubmit}>
      <h2>Создать статью</h2>
      <div className="mb-3">
        <input type="text" value={title} onChange={e => setTitle(e.target.value)} className="form-control" placeholder="Заголовок" required />
      </div>
      <div className="mb-3">
        <textarea value={body} onChange={e => setContent(e.target.value)} className="form-control" placeholder="Контент" required />
      </div>
      <button className="btn btn-success">Создать</button>
    </form>
  );
}
