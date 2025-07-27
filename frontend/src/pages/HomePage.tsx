import React from 'react';
import ArticleList from '../components/ArticleList';
import ArticleForm from '../components/ArticleForm';

export default function HomePage() {
  return (
    <>
      <ArticleForm />
      <hr />
      <ArticleList />
    </>
  );
}
