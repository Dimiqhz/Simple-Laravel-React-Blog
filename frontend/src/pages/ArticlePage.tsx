import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { useParams } from 'react-router-dom';
import CommentForm from '../components/CommentForm';

interface Comment {
  id: number;
  author_name: string;
  body: string;
}

interface Article {
  id: number;
  title: string;
  body: string;
  comments: Comment[];
}

const ArticlePage: React.FC = () => {
  const { id } = useParams<{ id: string }>();
  const [article, setArticle] = useState<Article | null>(null);

  useEffect(() => {
    axios.get(`/api/articles/${id}`).then(res => setArticle(res.data));
  }, [id]);

  const addComment = (comment: Comment) => {
    if (article) {
      setArticle({ ...article, comments: [...article.comments, comment] });
    }
  };

  return (
    <div className="container mt-5">
      {article && (
        <>
          <h1 className="mb-4">{article.title}</h1>
          <p className="lead">{article.body}</p>

          <hr />

          <section className="comments my-4">
            <h4 className="mb-3">Комментарии ({article.comments.length}):</h4>
            {article.comments.length === 0 && (
              <p className="text-muted">Комментариев пока нет. Будьте первым!</p>
            )}
            <ul className="list-group mb-4">
              {article.comments.map(comment => (
                <li key={comment.id} className="list-group-item">
                  <strong>{comment.author_name}:</strong>
                  <p className="mb-0">{comment.body}</p>
                </li>
              ))}
            </ul>
          </section>

          <section className="add-comment">
            <h5 className="mb-3">Добавить комментарий</h5>
            <CommentForm articleId={id!} onCommentAdded={addComment} />
          </section>
        </>
      )}
    </div>
  );
};

export default ArticlePage;
