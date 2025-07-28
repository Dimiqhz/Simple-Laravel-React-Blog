import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { Link } from 'react-router-dom';

interface Article {
  id: number;
  title: string;
  body: string;
}

const ArticleList: React.FC = () => {
  const [articles, setArticles] = useState<Article[]>([]);

  useEffect(() => {
    axios.get('/api/articles').then(res => setArticles(res.data));
  }, []);

  return (
    <div className="container py-5">
      <h1 className="mb-4 text-center">Все статьи</h1>

      <div className="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        {articles.map(article => (
          <div className="col" key={article.id}>
            <div className="card h-100 shadow-sm">
              <div className="card-body d-flex flex-column">
                <h5 className="card-title">{article.title}</h5>
                <p className="card-text text-truncate" style={{ maxHeight: '4.5em' }}>
                  {article.body}
                </p>
                <Link
                  to={`/articles/${article.id}`}
                  className="btn btn-primary mt-auto align-self-start"
                >
                  Читать далее
                </Link>
              </div>
            </div>
          </div>
        ))}
      </div>

      {articles.length === 0 && (
        <div className="text-center text-muted py-5">Статьи ещё не добавлены.</div>
      )}
    </div>
  );
};

export default ArticleList;
