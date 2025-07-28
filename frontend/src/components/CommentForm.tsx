import React, { useState } from 'react';
import api from '../api/axios';

type Props = {
  articleId: number;
};

export default function CommentForm({ articleId }: Props) {
  const [author_name, setAuthorName] = useState('');
  const [body, setContent] = useState('');

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    api.post(`/articles/${articleId}/comments`, { author_name, body }).then(() => {
      setAuthorName('');
      setContent('');
      window.location.reload();
    });
  };

  return (
    <form onSubmit={handleSubmit}>
      <div className="mb-2">
        <input value={author_name} onChange={e => setAuthorName(e.target.value)} className="form-control" placeholder="Ваше имя" required />
      </div>
      <div className="mb-2">
        <textarea value={body} onChange={e => setContent(e.target.value)} className="form-control" placeholder="Комментарий" required />
      </div>
      <button className="btn btn-primary">Отправить</button>
    </form>
  );
}
