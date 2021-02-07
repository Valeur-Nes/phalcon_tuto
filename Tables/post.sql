DROP TABLE IF EXISTS post;

CREATE TABLE post (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(50) NOT NULL,
    content varchar(255) NOT NULL,
    user_id int(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

INSERT INTO post VALUES
(1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel euismod sem. Sed vitae porttitor ipsum. Sed maximus, velit vitae semper venenatis, nulla turpis vestibulum dui, id varius arcu justo at nulla.', 1),
(2, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel euismod sem. Sed vitae porttitor ipsum. Sed maximus, velit vitae semper venenatis, nulla turpis vestibulum dui, id varius arcu justo at nulla.', 1),
(3, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel euismod sem. Sed vitae porttitor ipsum. Sed maximus, velit vitae semper venenatis, nulla turpis vestibulum dui, id varius arcu justo at nulla.', 1),
(4, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel euismod sem. Sed vitae porttitor ipsum. Sed maximus, velit vitae semper venenatis, nulla turpis vestibulum dui, id varius arcu justo at nulla.', 1),
(5, 'Quisque fringilla', 'Aenean iaculis arcu sit amet urna tincidunt consectetur. Proin accumsan porta ipsum. Quisque aliquet venenatis iaculis. Phasellus sodales sapien ut mauris tincidunt, vestibulum porttitor lacus gravida.', 2),
(6, 'Quisque fringilla', 'Aenean iaculis arcu sit amet urna tincidunt consectetur. Proin accumsan porta ipsum. Quisque aliquet venenatis iaculis. Phasellus sodales sapien ut mauris tincidunt, vestibulum porttitor lacus gravida.', 2),
(7, 'Quisque fringilla', 'Aenean iaculis arcu sit amet urna tincidunt consectetur. Proin accumsan porta ipsum. Quisque aliquet venenatis iaculis. Phasellus sodales sapien ut mauris tincidunt, vestibulum porttitor lacus gravida.', 2),
(8, 'Quisque fringilla', 'Aenean iaculis arcu sit amet urna tincidunt consectetur. Proin accumsan porta ipsum. Quisque aliquet venenatis iaculis. Phasellus sodales sapien ut mauris tincidunt, vestibulum porttitor lacus gravida.', 2),
(9, 'Quisque fringilla', 'Aenean iaculis arcu sit amet urna tincidunt consectetur. Proin accumsan porta ipsum. Quisque aliquet venenatis iaculis. Phasellus sodales sapien ut mauris tincidunt, vestibulum porttitor lacus gravida.', 2),
(10, 'Fusce condimentum', 'Praesent lacinia sodales mauris non aliquam. Duis interdum mi ut lectus consequat aliquet. Mauris fermentum, elit a dictum fringilla, leo augue facilisis nisl, in varius arcu mi eu augue. ', 3),
(11, 'Fusce condimentum', 'Praesent lacinia sodales mauris non aliquam. Duis interdum mi ut lectus consequat aliquet. Mauris fermentum, elit a dictum fringilla, leo augue facilisis nisl, in varius arcu mi eu augue. ', 3),
(12, 'Fusce condimentum', 'Praesent lacinia sodales mauris non aliquam. Duis interdum mi ut lectus consequat aliquet. Mauris fermentum, elit a dictum fringilla, leo augue facilisis nisl, in varius arcu mi eu augue. ', 3),
(13, 'Fusce condimentum', 'Praesent lacinia sodales mauris non aliquam. Duis interdum mi ut lectus consequat aliquet. Mauris fermentum, elit a dictum fringilla, leo augue facilisis nisl, in varius arcu mi eu augue. ', 3),
(14, 'Fusce condimentum', 'Praesent lacinia sodales mauris non aliquam. Duis interdum mi ut lectus consequat aliquet. Mauris fermentum, elit a dictum fringilla, leo augue facilisis nisl, in varius arcu mi eu augue. ', 3),
(15, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 4),
(16, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 4),
(17, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 4),
(18, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 4),
(19, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 5),
(20, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 5),
(21, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 5),
(22, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 5),
(23, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 7),
(24, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 7),
(25, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 7),
(26, 'Fusce tincidunt', 'Phasellus euismod tortor diam, vitae ornare dui volutpat a. Mauris et purus sollicitudin, pretium tellus et, scelerisque ligula.', 7);
