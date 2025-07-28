import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

interface Article {
  id: number;
  title: string;
  body: string;
}

export default function HomePage() {
  const [articles, setArticles] = useState<Article[]>([]);

  useEffect(() => {
    fetch('/api/articles')
      .then(res => res.json())
      .then(setArticles)
      .catch(console.error);
  }, []);

  return (
    <div className="container py-5">
      <h1 className="text-center mb-4">📰 Список статей</h1>

      <div className="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        {articles.map(article => (
          <div className="col" key={article.id}>
            <div className="card shadow-sm h-100">
              <div className="card-body d-flex flex-column">
                <h5 className="card-title">{article.title}</h5>
                <p className="card-text text-muted">
                  {article.body.substring(0, 100)}...
                </p>
                <Link
                  to={`/articles/${article.id}`}
                  className="btn btn-outline-primary mt-auto align-self-start"
                >
                  Читать далее →
                </Link>
              </div>
            </div>
          </div>
        ))}
      </div>

      {articles.length === 0 && (
        <div className="text-muted text-center py-4">Статей пока нет.</div>
      )}
    </div>
  );
}
