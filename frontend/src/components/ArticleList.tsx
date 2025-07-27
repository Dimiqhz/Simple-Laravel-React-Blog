import React, { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';
import api from '../api/axios';

type Article = {
  id: number;
  title: string;
  content: string;
  created_at: string;
};

export default function ArticleList() {
  const [articles, setArticles] = useState<Article[]>([]);

  useEffect(() => {
    api.get('/articles').then(res => setArticles(res.data));
  }, []);

  return (
    <div>
      <h2>Список статей</h2>
      {articles.map(article => (
        <div className="card mb-3" key={article.id}>
          <div className="card-body">
            <h5 className="card-title">{article.title}</h5>
            <p className="card-text text-muted">{new Date(article.created_at).toLocaleString()}</p>
            <Link to={`/articles/${article.id}`} className="btn btn-sm btn-primary">Читать</Link>
          </div>
        </div>
      ))}
    </div>
  );
}
