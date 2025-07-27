import React from 'react';
import { Article } from '../types/article';

type Props = {
  article: Article;
};

export default function ArticleDetail({ article }: Props) {
  return (
    <div>
      <h2>{article.title}</h2>
      <p className="text-muted">{new Date(article.created_at).toLocaleString()}</p>
      <p>{article.content}</p>
    </div>
  );
}
