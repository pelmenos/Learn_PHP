</td>

<td width="300px" class="sidebar">
    <div class="sidebarHeader">Меню</div>
    <ul>
        <li><a href="/OOP/lvl2/www">Главная страница</a></li>
        <?php if (!empty($user) && $user->isAdmin()):?>
            <li><a href="/OOP/lvl2/www/admin">Админка</a></li>
        <?php endif; ?>
    </ul>
</td>
</tr>
<tr>
    <td class="footer" colspan="2">Все права защищены (c) Мой блог</td>
</tr>
</table>

</body>
</html>
