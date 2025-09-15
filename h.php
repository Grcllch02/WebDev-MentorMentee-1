<tbody>
                        <?php
                        $counter = 0;
                        $allmemntee = getAllMentee();
                        foreach ($allmemntee as $index => $mentee) {
                            $counter++;
                        ?>

                            <tr>
                                <th scope="row"><?= $counter ?></th>
                                <td><?= $mentee['nama'] ?></td> <!-- sm kek yg di model name,dkk -->
                                <td><?= $mentee['jurusan'] ?></td>
                                <td><?= $mentee['no_telepon'] ?></td>
                                <td>
                                    <a href="view_updatementee.php?updateMenteeID=<?= $mentee['mentee_id'] ?>">
                                        <button class="btn btn-warning">Update</button>
                                    </a>
                                    <a href="controller.php?deleteMenteeID=<?= $mentee['id'] ?>"> <!-- klo lgsg tulis ?deleteID gitu itu pake method get yg bakal tampil di url -->
                                        <button class="btn btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>

                    </tbody>