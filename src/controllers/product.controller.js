import * as productService from '../services/product.service.js';

export const createProduct = async (req, res) => {
    try {
        const data = req.body;
        const product = await productService.createProduct(data);
        res.status(201).json(product);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const updateProduct = async (req, res) => {
    try {
        const id = req.params.id;
        const data = req.body;
        const product = await productService.updateProduct(id, data);
        res.status(200).json(product);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const deleteProduct = async (req, res) => {
    try {
        const id = req.params.id;
        const product = await productService.deleteProduct(id);
        res.status(200).json(product);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const getAllProducts = async (req, res) => {
    try {
        const products = await productService.getAllProducts();
        res.status(200).json(products);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const getProductById = async (req, res) => {
    try {
        const id = req.params.id;
        const product = await productService.getProductById(id);
        res.status(200).json(product);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};