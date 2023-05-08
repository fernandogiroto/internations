import axios, { AxiosInstance } from 'axios';

const api: AxiosInstance = axios.create({
    baseURL: "X/api/internations/",
});

export default api;