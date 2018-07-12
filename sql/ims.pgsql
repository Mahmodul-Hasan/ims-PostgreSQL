--
-- PostgreSQL database dump
--

-- Dumped from database version 10.4
-- Dumped by pg_dump version 10.4

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: address; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.address (
    addresss_id integer NOT NULL,
    street character varying(25) NOT NULL,
    city character varying(25) NOT NULL,
    state character varying(25) NOT NULL
);


ALTER TABLE public.address OWNER TO postgres;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    admin_id integer NOT NULL,
    admin_name character varying(25) NOT NULL,
    admin_contact_no character varying(25) NOT NULL,
    admin_email character varying(25) NOT NULL
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: bill_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bill_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bill_id_seq OWNER TO postgres;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    category_id integer NOT NULL,
    category_name character varying(25) NOT NULL
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: category_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.category_id_seq OWNER TO postgres;

--
-- Name: customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customer (
    customer_id integer NOT NULL,
    customer_name character varying(25) NOT NULL,
    customer_contact_no character varying(25) NOT NULL,
    customer_email character varying(25) NOT NULL
);


ALTER TABLE public.customer OWNER TO postgres;

--
-- Name: customer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.customer_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customer_id_seq OWNER TO postgres;

--
-- Name: item_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.item_id_seq OWNER TO postgres;

--
-- Name: items; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.items (
    item_id integer NOT NULL,
    item_name character varying(25) NOT NULL,
    category_id integer NOT NULL,
    item_price real,
    item_stock integer NOT NULL,
    production_date date NOT NULL
);


ALTER TABLE public.items OWNER TO postgres;

--
-- Name: manager; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.manager (
    manager_id integer NOT NULL,
    manager_name character varying(25) NOT NULL,
    hire_date date NOT NULL,
    manager_salary integer NOT NULL,
    manager_email character varying(25) NOT NULL,
    manager_contact_no character varying(25) NOT NULL
);


ALTER TABLE public.manager OWNER TO postgres;

--
-- Name: material_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.material_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.material_id_seq OWNER TO postgres;

--
-- Name: monthly_expense; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.monthly_expense (
    bill_id integer NOT NULL,
    manager_id integer NOT NULL,
    house_rent integer NOT NULL,
    electricity_bill integer NOT NULL,
    others integer NOT NULL,
    bill_date date NOT NULL,
    month character varying(25) NOT NULL
);


ALTER TABLE public.monthly_expense OWNER TO postgres;

--
-- Name: orders; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.orders (
    order_id integer NOT NULL,
    item_id integer NOT NULL,
    manager_id integer NOT NULL,
    customer_id integer NOT NULL,
    order_quantity integer NOT NULL,
    order_date date NOT NULL,
    total_price real NOT NULL
);


ALTER TABLE public.orders OWNER TO postgres;

--
-- Name: raw_materials; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.raw_materials (
    material_id integer NOT NULL,
    manager_id integer NOT NULL,
    vendor_id integer NOT NULL,
    material_name character varying(25) NOT NULL,
    available_stock integer NOT NULL,
    material_unit_price real NOT NULL,
    production_date date NOT NULL
);


ALTER TABLE public.raw_materials OWNER TO postgres;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    user_id integer NOT NULL,
    role character varying(20) NOT NULL,
    password character varying(20) NOT NULL,
    status character varying(10) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: vendor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vendor (
    vendor_id integer NOT NULL,
    vendor_name character varying(25) NOT NULL,
    vendor_contact_no character varying(25) NOT NULL,
    vendor_email character varying(25) NOT NULL,
    vendor_address character varying(25) NOT NULL
);


ALTER TABLE public.vendor OWNER TO postgres;

--
-- Name: vendor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vendor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vendor_id_seq OWNER TO postgres;

--
-- Data for Name: address; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.address (addresss_id, street, city, state) FROM stdin;
201	10, Mirpur	Dhaka	Dhaka
202	14, Mirpur	Dhaka	Dhaka
203	27, Dhanmondi	Dhaka	Dhaka
456	11 Banani	Dhaka	Dhaka
\.


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin (admin_id, admin_name, admin_contact_no, admin_email) FROM stdin;
101	Mahmodul Hasan	01521212702	mahmodul1390@gmail.com
102	Shawan	01867381390	shawan@gmail.com
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (category_id, category_name) FROM stdin;
303	cat3
307	cloth
308	Apparel
309	Sports
311	Cat2
313	Cat4
314	Drinks
315	Music
316	Home Appliance
317	Frozen Food
318	Chocolate
\.


--
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customer (customer_id, customer_name, customer_contact_no, customer_email) FROM stdin;
10001	Abdul Hamid	01711447788	hamid@gmail.com
10002	Kamal khan	01912447788	kamal@yahoo.com
10003	Jamshed Jamil 	01674125896	jamil@gmail.com
10004	Jalal Khan	01722558899	khh@gmail.com
10005	Kamal Khan	01841225588	kamal@gmail.com
10006	Mushfiqur Rahman	01867381390	mushfiq@gmail.com
10007	Saadat Nafi	01867452312	nafi12@gmail.com
10008	Rahat Reza	01676519711	rahar.reza@gmail.com
10009	Emon Tariqul	01912986543	tariq@yahoo.com
10010	Maimun Alamin	01723671543	maimun@gmail.com
10011	Muna	01867381342	muna@yahoo.com
\.


--
-- Data for Name: items; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.items (item_id, item_name, category_id, item_price, item_stock, production_date) FROM stdin;
100002	Car	303	11	26	2017-08-05
100003	Item3	307	11	26	2017-08-02
100007	Pen	314	4	144	2017-08-16
100001	Soap	303	11	16	2017-08-03
100009	Book	311	20	60	2017-08-17
100010	Ball	309	15	59	2018-07-11
100011	Guiter	315	5600	15	2018-07-11
100004	Shirts	313	11	26	2017-06-01
100005	Pants	308	11	26	2017-08-16
100006	Biscuits	313	11	26	2017-08-16
100008	Kitkat	308	23	128	2017-08-16
\.


--
-- Data for Name: manager; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.manager (manager_id, manager_name, hire_date, manager_salary, manager_email, manager_contact_no) FROM stdin;
203	Kamal Haque	2017-08-01	5600	hoque@yahoo.com	6565656
210	Abul kalam	2017-08-15	2500	something@gmail.com	017745878
211	Shihab Mollah	2017-08-17	1000	shihab@gmail.com	01774552244
212	Tanvir 	2017-08-18	20000	tsnvir@gmail.com	01676519711
213	Tariqul	2018-07-10	25000	tariq@gmail.com	01767879809
202	Rahman Ahmed	2017-08-01	30000	ahm@gmail.com	01523676512
201	Kuddus	2017-08-02	6688	kuddus@gmail.com	01867349211
\.


--
-- Data for Name: monthly_expense; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.monthly_expense (bill_id, manager_id, house_rent, electricity_bill, others, bill_date, month) FROM stdin;
8001	201	50000	6000	2654	2017-08-02	August
8002	202	5000	2000	6000	2017-08-05	September
8003	202	5600	69877	4500	2017-08-16	July
8004	201	2000	3000	2000	2017-08-16	December
8005	203	3000	1200	6988	2017-08-16	June
8006	201	4000	2300	7870	2018-07-10	June
8007	201	5000	2000	5015	2018-07-10	July
8008	201	6000	1200	7500	2018-07-11	May
8009	201	7000	1800	6000	2018-07-11	April
\.


--
-- Data for Name: orders; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.orders (order_id, item_id, manager_id, customer_id, order_quantity, order_date, total_price) FROM stdin;
10000000	100001	201	10001	30	2017-08-01	0
10000001	100002	202	10002	40	2017-08-03	0
10000003	100003	203	10001	4	2017-08-02	0
10000004	100003	201	10001	10	2017-08-17	110
10000005	100001	201	10006	5	2017-08-17	55
10000006	100007	201	10010	2	2017-08-17	8
10000007	100007	203	10006	5	2018-07-10	20
10000008	100009	203	10007	15	2018-07-10	300
10000009	100001	201	10008	5	2018-07-10	55
10000010	100009	201	10006	6	2018-07-11	120
10000011	100008	201	10011	3	2018-07-11	69
\.


--
-- Data for Name: raw_materials; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.raw_materials (material_id, manager_id, vendor_id, material_name, available_stock, material_unit_price, production_date) FROM stdin;
700004	201	601	mat4	10	20	2017-03-16
700005	201	604	Aluminia	150	315	2018-07-11
700003	202	607	Citric Acid	50	45	2017-03-13
700002	202	602	Bread	45	50	2017-04-01
700001	201	601	Grains	90	50	2017-03-01
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (user_id, role, password, status) FROM stdin;
101	admin	pass	active
202	mgr	pass	inactive
203	mgr	pass	active
210	mgr	pass	active
211	mgr	pass	active
212	mgr	pass	active
213	mgr	pass	active
201	mgr	pass	active
\.


--
-- Data for Name: vendor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vendor (vendor_id, vendor_name, vendor_contact_no, vendor_email, vendor_address) FROM stdin;
601	Kazi	01789235614	local1@gmail.com	Savar, Dhaka
602	Tamim Group	01976234567	tg@gmail.com	Shirajganj
603	King Brand	01523761587	kb@yahoo.com	Ashuganj
604	OOH Brand	017121298780	acbc@gmail.com	Badda,Dhaka
605	Vinyl Group	01876123546	bb@gmail.com	Dhaka
606	Small Brand	01867381390	sb@gmail.com	Dhanmondi,Dhaka
607	DPI	01999111672	dpi@gmail.com	Mirpur,Dhaka
\.


--
-- Name: bill_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bill_id_seq', 1, false);


--
-- Name: category_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.category_id_seq', 1, false);


--
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customer_id_seq', 1, false);


--
-- Name: item_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.item_id_seq', 1, false);


--
-- Name: material_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.material_id_seq', 1, false);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.user_id_seq', 1, false);


--
-- Name: vendor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vendor_id_seq', 5, true);


--
-- Name: address address_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.address
    ADD CONSTRAINT address_pkey PRIMARY KEY (addresss_id);


--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (admin_id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (category_id);


--
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (customer_id);


--
-- Name: items items_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.items
    ADD CONSTRAINT items_pkey PRIMARY KEY (item_id);


--
-- Name: manager manager_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.manager
    ADD CONSTRAINT manager_pkey PRIMARY KEY (manager_id);


--
-- Name: monthly_expense monthly_expense_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.monthly_expense
    ADD CONSTRAINT monthly_expense_pkey PRIMARY KEY (bill_id);


--
-- Name: raw_materials raw_materials_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.raw_materials
    ADD CONSTRAINT raw_materials_pkey PRIMARY KEY (material_id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);


--
-- Name: vendor vendor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vendor
    ADD CONSTRAINT vendor_pkey PRIMARY KEY (vendor_id);


--
-- PostgreSQL database dump complete
--

