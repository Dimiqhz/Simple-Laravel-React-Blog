// src/pages/HomePage.tsx
import { useEffect, useState } from 'react';
import { Link } from 'react-router-dom';

interface Article { id: number; title: string; }

export default function HomePage() {
  const [articles, setArticles] = useState<Article[]>([]);
  useEffect(() => {
    fetch('/api/articles')
      .then(res => res.json())
      .then(setArticles)
      .catch(console.error);
  }, []);

  return (
    <div>
      <h1>Список статей</h1>
      <ul>
        {articles.map(a => (
          <li key={a.id}>
            <Link to={`/articles/${a.id}`}>{a.title}</Link>
          </li>
        ))}
      </ul>
    </div>
  );
}
