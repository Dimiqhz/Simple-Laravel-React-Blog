export type Comment = {
  id: number;
  author_name: string;
  content: string;
};

export type Article = {
  id: number;
  title: string;
  content: string;
  created_at: string;
  comments: Comment[];
};
