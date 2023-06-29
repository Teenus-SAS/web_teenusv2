getEbook = async () => {
  const response = await fetch(`/api/ebooks`);

  response.ok;
  response.status;
  const text = await response.text();

  data = JSON.parse(text);
  return data;
};
