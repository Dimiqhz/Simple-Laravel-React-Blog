import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import api from '../api/axios';
import CommentForm from '../components/CommentForm';

type Comment = {
  id: number;
  author_name: string;
  content: string;
};

type Article = {
  id: number;
  title: string;
  content: string;
  created_at: string;
  comments: Comment[];
};

export default function ArticlePage() {
  const { id } = useParams();
  const [article, setArticle] = useState<Article | null>(null);

  useEffect(() => {
    api.get(`/articles/${id}`).then(res => setArticle(res.data));
  }, [id]);

  if (!article) return <p>Загрузка...</p>;

  return (
    <div>
      <h2>{article.title}</h2>
      <p>{article.content}</p>
      <hr />
      <h4>Комментарии:</h4>
      {article.comments.map(comment => (
        <div key={comment.id} className="mb-2">
          <strong>{comment.author_name}</strong>: {comment.content}
        </div>
      ))}
      <hr />
      <CommentForm articleId={article.id} />
    </div>
  );
}
