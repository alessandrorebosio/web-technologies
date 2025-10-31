<header>
    <h2><?php echo $params["page_title"]; ?></h2>
</header>

<section>
    <form action="#">
        <ul>
            <li>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" />
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" />
            </li>
            <li>
                <input type="submit" name="submit" value="Login" />
            </li>
        </ul>
    </form>
</section>