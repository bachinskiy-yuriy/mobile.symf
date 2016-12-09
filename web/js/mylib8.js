                                            function check(obj) {
                                            // use the modulus operator '%' to see if there is a remainder
                                            remainder=obj.value % 1;
                                            quantity=obj.value;
                                            if (remainder  != 0) {
                                                alert('You can buy this product only in multiples of 1 pieces!!');
                                                obj.value = quantity-remainder;
                                                return false;
                                                }
                                            return true;
                                            }
