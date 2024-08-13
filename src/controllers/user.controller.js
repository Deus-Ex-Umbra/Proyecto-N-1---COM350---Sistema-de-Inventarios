import * as userService from '../services/user.service.js';

export const createUser = async (req, res) => {
    try {
        const data = req.body;
        const user = await userService.createUser(data);
        res.status(201).json(user);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const updateUser = async (req, res) => {
    try {
        const id = req.params.id;
        const data = req.body;
        const user = await userService.updateUser(id, data);
        res.status(200).json(user);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const deleteUser = async (req, res) => {
    try {
        const id = req.params.id;
        const user = await userService.deleteUser(id);
        res.status(200).json(user);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const getAllUsers = async (req, res) => {
    try {
        const users = await userService.getAllUsers();
        res.status(200).json(users);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const getUserById = async (req, res) => {
    try {
        const id = req.params.id;
        const user = await userService.getUserById(id);
        res.status(200).json(user);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};